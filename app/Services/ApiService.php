<?php

namespace App\Services;

use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Kontrak;
use App\Traits\ApiResponser;
use Exception;

class ApiService
{
    use ApiResponser;

    private $pegawaiModel, $jabatanModel, $kontrakModel;

    public function __contruct(
        Pegawai $pegawaiModel,
        Jabatan $jabatanModel,
        Kontrak $kontrakModel
    ){
        $this->pegawaiModel = $pegawaiModel;
        $this->jabatanModel = $jabatanModel;
        $this->kontrakModel = $kontrakModel;
    }

    //Get Data Pegawai
    public function getPegawaiList($filter = [], $withPaginate = true, $offset = 0, $limit = 10, $with = [], $orderBy = [])
    {
        $pegawai = $this->pegawaiModel->query();

        if(isset($filter['nama']))
            $pegawai->where('nama_lengkap', $filter['nama']);
        
        if(isset($filter['q']))
            $pegawai->when($filter['q'], function ($pegawai, $q){
               $pegawai->where('nama_lengkap', 'like' . $q. '%');
            });

        if(isset($filter['offset']))
            $offset = $filter['offset'];

        if(isset($filter['limit']))
            $limit = $filter['limit'];

        if(!empty($with))
            $pegawai->with($with);

        if(!empty($orderBy))
            foreach ($orderBy as $key => $value) {
                $pegawai->orderBy($key, $value);
            }

        $count = $pegawai->count();

        if ($withPaginate == true) {
            $result['count'] = $count;
            $result['offset'] = $offset;
            $result['limit'] = $limit;
            $result['data'] = $pegawai->paginate($limit);
            $result['params'] = [
                'filter' => $filter,
                'orderBy' => $orderBy
            ];
        } else {
            
            if ($limit > 0)
            $pegawai->limit($limit);

            $result['count'] = $count;
            $result['offset'] = $offset;
            $result['limit'] = $limit;
            $result['data'] = $pegawai->get();
            $result['params'] = [
                'filter' => $filter,
                'orderBy' => $orderBy
            ];
        }

        return $result;
    }

    //Get Data Jabatan
    public function getJabatanList($filter = [], $withPaginate = true, $offset = 0, $limit = 10, $with = [], $orderBy = [])
    {
        $jabatan = $this->jabatanModel->query();

        if(isset($filter['nama']))
            $jabatan->where('nama', $filter['nama']);
        
        if(isset($filter['q']))
            $jabatan->when($filter['q'], function ($jabatan, $q){
               $jabatan->where('nama', 'like' . $q. '%');
            });

        if(isset($filter['offset']))
            $offset = $filter['offset'];

        if(isset($filter['limit']))
            $limit = $filter['limit'];

        if(!empty($with))
            $jabatan->with($with);

        if(!empty($orderBy))
            foreach ($orderBy as $key => $value) {
                $jabatan->orderBy($key, $value);
            }

        $count = $jabatan->count();

        if ($withPaginate == true) {
            $result['count'] = $count;
            $result['offset'] = $offset;
            $result['limit'] = $limit;
            $result['data'] = $jabatan->paginate($limit);
            $result['params'] = [
                'filter' => $filter,
                'orderBy' => $orderBy
            ];
        } else {
            
            if ($limit > 0)
            $jabatan->limit($limit);

            $result['count'] = $count;
            $result['offset'] = $offset;
            $result['limit'] = $limit;
            $result['data'] = $jabatan->get();
            $result['params'] = [
                'filter' => $filter,
                'orderBy' => $orderBy
            ];
        }

        return $result;
    }

    //CRUD Kontrak
    public function getKontrakList($filter = [], $withPaginate = true, $offset = 0, $limit = 10, $with = [], $orderBy = [])
    {
        $kontrak = $this->kontrakModel->query();

        if(isset($filter['nama']))
            $kontrak->whereHas('pegawai', function ($q) use ($filter) {
                $q->where('nama_lengkap', $filter['nama']);
            });
        
        if(isset($filter['q']))
            $kontrak->when($filter['q'], function ($kontrak, $q){
               $q->where('nama_lengkap', 'like' . $q. '%');
            });

        if(isset($filter['offset']))
            $offset = $filter['offset'];

        if(isset($filter['limit']))
            $limit = $filter['limit'];

        if(!empty($with))
            $kontrak->with($with);

        if(!empty($orderBy))
            foreach ($orderBy as $key => $value) {
                $kontrak->orderBy($key, $value);
            }

        $count = $kontrak->count();

        if ($withPaginate == true) {
            $result['count'] = $count;
            $result['offset'] = $offset;
            $result['limit'] = $limit;
            $result['data'] = $kontrak->paginate($limit);
            $result['params'] = [
                'filter' => $filter,
                'orderBy' => $orderBy
            ];
        } else {
            
            if ($limit > 0)
            $kontrak->limit($limit);

            $result['count'] = $count;
            $result['offset'] = $offset;
            $result['limit'] = $limit;
            $result['data'] = $kontrak->get();
            $result['params'] = [
                'filter' => $filter,
                'orderBy' => $orderBy
            ];
        }

        return $result;
    }

    public function getKontrak($where, $with = [])
    {
        $kontrak = $this->kontrakModel->query();

        if(!empty($with))
            $kontrak->with($with);

        $result = $kontrak->firstWhere($where);

        return $result;
    }

    public function storeKontrak($data)
    {
        $kontrak = new Kontrak();
        try{
            $kontrak->pegawai_id = $data->pegawai_id;
            $kontrak->jabatan_id = $data->jabatan_id;
            $kontrak->tanggal_surat = $data->tanggal_surat;
            $kontrak->tanggal_awal = $data->tanggal_awal;
            $kontrak->tanggal_akhir = $data->tanggal_akhir;
            $kontrak->dokumen = $data->dokumen;
            $kontrak->jenis_kerjasama = $data->jenis_kerjasama;
            $kontrak->durasi = $data->durasi;
            $kontrak->save();
            
            return $this->success($kontrak, 'Data has been saved!');
        } catch (Exception $e) {
            return $this->error(null, $e->getMessage());
        }
    }

    public function updateKontrak($where, $data)
    {
        $kontrak = $this->getKontrak($where);

        try {
            $kontrak->pegawai_id = $data->pegawai_id;
            $kontrak->jabatan_id = $data->jabatan_id;
            $kontrak->tanggal_surat = $data->tanggal_surat;
            $kontrak->tanggal_awal = $data->tanggal_awal;
            $kontrak->tanggal_akhir = $data->tanggal_akhir;
            $kontrak->dokumen = $data->dokumen;
            $kontrak->jenis_kerjasama = $data->jenis_kerjasama;
            $kontrak->durasi = $data->durasi;
            $kontrak->save();

            return $this->success($kontrak, 'Data has been updated!');
        } catch (Exception $e) {
           return $this->error(null, $e->getMessage());
        }
    }

    public function deletekontrak($where)
    {
        $kontrak = $this->getkontrak($where);

        try{
            $kontrak->forceDelete();
            return $this->success($kontrak, 'Data has been deleted!');
        } catch (Exception $e) {
            return $this->error(null, $e->getMessage());
         }
    }

}