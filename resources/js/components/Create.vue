<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>Create Data</h4>
                        <hr />
                        <form @submit.prevent="addData()">
                            <div class="form-group">
                                <label for="">Tanggal Surat</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    v-model="form.tanggal_surat"
                                />
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="">Nama Pegawai</label>
                                <select
                                    v-model="form.pegawai_id"
                                    class="form-control"
                                >
                                    <option
                                        v-for="(pegawai, k) in pegawais"
                                        :key="k"
                                        :value="pegawai.value"
                                    >
                                        {{ pegawai.text }}
                                    </option>
                                </select>
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <select
                                    v-model="form.jabatan_id"
                                    class="form-control"
                                >
                                    <option
                                        v-for="(jabatan, k) in jabatans"
                                        :key="k"
                                        :value="jabatan.value"
                                    >
                                        {{ jabatan.text }}
                                    </option>
                                </select>
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="">Tanggal Mulai</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    v-model="form.tanggal_mulai"
                                />
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="">Tanggal Selesai</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    v-model="form.tanggal_selesai"
                                />
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="">Jenis Kerja Sama</label>
                                <select
                                    v-model="form.jenis_kerja"
                                    class="form-control"
                                >
                                    <option
                                        v-for="(jenis, k) in jenisks"
                                        :key="k"
                                        :value="jenis.value"
                                    >
                                        {{ jenis.text }}
                                    </option>
                                </select>
                            </div>
                            <br />
                            <button class="btn btn-success" type="submit">
                                Submit
                            </button>
                        </form>
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
            form: {
                tanggal_surat: "",
                tanggal_mulai: "",
                tanggal_selesai: "",
                pegawai_id: "",
                jabatan_id: "",
                jenis_kerja: "",
                dokumen: "",
            },

            pegawais: [],
            jabatans: [],
            jenisks: [
                { text: "Magang", value: "Magang" },
                { text: "Pegawai Tetap", value: "Pegawai Tetap" },
                { text: "Pegawai Kontrak", value: "Pegawai Kontrak" },
                { text: "Outsource", value: "Outsource" },
            ],
        };
    },
    created() {
        this.pegawaiList();
        this.jabatanList();
    },
    methods: {
        addData() {
            axios
                .post("http://localhost:8000/api/kontrak", {
                    tanggal_surat: this.form.tanggal_surat,
                    tanggal_awal: this.form.tanggal_mulai,
                    tanggal_akhir: this.form.tanggal_selesai,
                    jenis_kerjasama: this.form.jenis_kerja,
                    pegawai_id: this.form.pegawai_id,
                    jabatan_id: this.form.jabatan_id,
                })
                .then((response) => {
                    this.$router.push("/");
                });
        },
        pegawaiList() {
            axios.get("http://localhost:8000/api/pegawai").then((res) => {
                const data = res.data.data.data;

                data.forEach((el) => {
                    this.pegawais.push({
                        text: el.nama_lengkap,
                        value: el.id,
                    });
                });
            });
        },
        jabatanList() {
            axios.get("http://localhost:8000/api/jabatan").then((res) => {
                const data = res.data.data.data;

                data.forEach((el) => {
                    this.jabatans.push({
                        text: el.nama,
                        value: el.id,
                    });
                });
            });
        },
    },
};
</script>
