<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h4>Kontrak Pegawai</h4>
                            </div>
                            <div class="col-md-2">
                                <router-link
                                    class="btn btn-primary w-100"
                                    to="/create"
                                    >Add</router-link
                                >
                            </div>
                        </div>
                        <hr />
                        <table class="table table-striped table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal Surat</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Tanggal Selesai</th>
                                    <th scope="col">Pegawai</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Jenis Kerja Sama</th>
                                    <th scope="col">Dokumen</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(kontrak, k) in kontraks" :key="k">
                                    <td>{{ ++k }}</td>
                                    <td>{{ kontrak.tanggal_surat }}</td>
                                    <td>{{ kontrak.tanggal_mulai }}</td>
                                    <td>{{ kontrak.tanggal_akhir }}</td>
                                    <td>{{ kontrak.pegawai.nama_lengkap }}</td>
                                    <td>{{ kontrak.jabatan.nama }}</td>
                                    <td>{{ kontrak.jenis_kerjasama }}</td>
                                    <td>{{ kontrak.dokumen }}</td>
                                    <td>
                                        <div style="display: flex">
                                            <router-link
                                                class="btn btn-warning"
                                                :to="'/update/' + kontrak.id"
                                                style="margin-right: 5px"
                                                >Update</router-link
                                            >
                                            <button
                                                class="btn btn-danger"
                                                @click="deleteData(kontrak.id)"
                                            >
                                                Delete
                                            </button>
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
            kontraks: [],
        };
    },
    created() {
        this.loadData();
    },
    methods: {
        loadData() {
            axios.get("http://localhost:8000/api/kontrak").then((res) => {
                this.kontraks = res.data.data;
            });
        },
        deleteData(id) {
            axios
                .delete("http://localhost:8000/api/kontrak/" + id)
                .then((res) => {
                    this.loadData();
                });
        },
    },
};
</script>
