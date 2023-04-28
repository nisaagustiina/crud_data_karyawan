<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\InvalidOrderException;
use App\Traits\ApiResponser;
use App\Services\ApiService;


class ApiController extends Controller
{
   use ApiResponser;

   private $apiService;

   public function __construct(
    ApiService $apiService
   ){
    $this->apiService = $apiService;
   }

   //Api Data Pegawai
   public function getPegawaiList(Request $request)
   {
        $filter = [];

        if($request->input('offset', '') != ''){
            $filter['offset'] = $request->input('offset');
        }

        if($request->input('limit', '') != ''){
            $filter['limit'] = $request->input('limit');
        }

        $q = $request->input('q', '');
        if ($q != '') {
            $filter['q'] = $q;
        }

        if($request->input('nama', '') != ''){
            $filter['nama'] = $request->input('nama');
        }

        if($request->input('order_by', '') != ''){
            $orderBy = $request->input('order_by');
        }else{
            $orderBy = 'id';
        }

        //orderType inc ASC|DESC
        if($request->input('order_type', '') != ''){
            $orderType = $request->input('order_type');
        }else{
            $orderType = 'asc';
        }

        $data = $this->apiService->getPegawaiList($filter, false, 0, 11, ['kontrak'], [$orderBy => $orderType]);

        return $this->success($data);
   }

    //Api Data Jabatan
    public function getJabatanList(Request $request)
    {
         $filter = [];
 
         if($request->input('offset', '') != ''){
             $filter['offset'] = $request->input('offset');
         }
 
         if($request->input('limit', '') != ''){
             $filter['limit'] = $request->input('limit');
         }
 
         $q = $request->input('q', '');
         if ($q != '') {
             $filter['q'] = $q;
         }
 
         if($request->input('nama', '') != ''){
             $filter['nama'] = $request->input('nama');
         }
 
         if($request->input('order_by', '') != ''){
             $orderBy = $request->input('order_by');
         }else{
             $orderBy = 'id';
         }
 
         //orderType inc ASC|DESC
         if($request->input('order_type', '') != ''){
         $orderType = $request->input('order_type');
         }else{
         $orderType = 'asc';
         }
 
         $data = $this->apiService->getJabatanList($filter, false, 0, 10, [], [$orderBy => $orderType]);
 
         return $this->success($data);
    }

    //CRUD Kontrak
    public function getKontrakList(Request $request)
    {
        
      $filter = [];

      if($request->input('offset', '') != ''){
        $filter['offset'] = $request->input('offset');
      }

      if($request->input('limit', '') != ''){
        $filter['limit'] = $request->input('limit');
      }

      $q = $request->input('q', '');
      if ($q != '') {
          $filter['q'] = $q;
      }

      if($request->input('nama', '') != ''){
        $filter['nama'] = $request->input('nama');
      }

      if($request->input('order_by', '') != ''){
        $orderBy = $request->input('order_by');
      }else{
        $orderBy = 'id';
      }

      //orderType inc ASC|DESC
      if($request->input('order_type', '') != ''){
        $orderType = $request->input('order_type');
      }else{
        $orderType = 'asc';
      }

      $data = $this->apiService->getKontrakList($filter, false, 0, 11, ['pegawai','jabatan'], [$orderBy => $orderType]);

      return $this->success($data);
    }

    public function storeKontrak(Request $request)
    {
        return $this->apiService->storeKontrak($request);
    }

    public function getKontrak($id)
    {
        $data = $this->apiService->getKontrak(['id' => $id],[]);
        return $this->success($data);
    }

    public function updateKontrak(Request $request, $id)
    {
        return $this->apiService->updateKontrak(['id' => $id], $request);
    }

    public function deleteKontrak($id)
    {
        return $this->apiService->deleteKontrak(['id' => $id]);
    }
}
