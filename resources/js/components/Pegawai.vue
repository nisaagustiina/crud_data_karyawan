<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2">
                <router-link class="btn btn-primary w-100" to="/">List Kontrak</router-link>
            </div>
            <br><br><br>
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h4>List Pegawai</h4>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <hr />
                        <table class="table table-striped table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Tempat, Tanggal Lahir</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Agama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Status Pernikahan</th>
                                    <th scope="col">No. Telp</th>
                                    <th scope="col">Pendidikan Terakhir</th>
                                    <th scope="col">Kontrak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(pegawai, k) in pegawais.data" :key="k">
                                    <td>{{ ++k }}</td>
                                    <td>{{ pegawai.nip }}</td>
                                    <td>{{ pegawai.nama_lengkap }}</td>
                                    <td>{{ pegawai.tempat_lahir + ', ' + pegawai.tanggal_lahir }}</td>
                                    <td>{{ pegawai.jenis_kelamin }}</td>
                                    <td>{{ pegawai.agama }}</td>
                                    <td>{{ pegawai.alamat }}</td>
                                    <td>{{ pegawai.status_pernikahan }}</td>
                                    <td>{{ pegawai.no_telp }}</td>
                                    <td>{{ pegawai.pend_terakhir }}</td>
                                    <td>
                                        <div v-if="pegawai.kontrak == null">
                                            Tidak
                                        </div>
                                        <div v-else>
                                            Ya
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pegawais: [],
        };
    },
    created() {
        this.loadData();
    },
    methods: {
        loadData() {
            axios.get("http://localhost:8000/api/pegawai").then((res) => {
                this.pegawais = res.data.data;
                console.log(res.data.data.data);
            });
        },
    },
};
</script>
