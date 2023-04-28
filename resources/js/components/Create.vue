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
                                <input type="date" class="form-control" v-model="v$.form.tanggal_surat.$model" />
                                <div class="input-errors" v-for="(error, index) of v$.form.tanggal_surat.$errors"
                                    :key="index">
                                    <div class="error-msg">{{ error.$message }}</div>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="">Nama Pegawai</label>
                                <select v-model="v$.form.pegawai_id.$model" class="form-control">
                                    <option v-for="(pegawai, k) in pegawais" :key="k" :value="pegawai.value">
                                        {{ pegawai.text }}
                                    </option>
                                </select>
                                <div class="input-errors" v-for="(error, index) of v$.form.pegawai_id.$errors" :key="index">
                                    <div class="error-msg">{{ error.$message }}</div>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <select v-model="v$.form.jabatan_id.$model" class="form-control">
                                    <option v-for="(jabatan, k) in jabatans" :key="k" :value="jabatan.value">
                                        {{ jabatan.text }}
                                    </option>
                                </select>
                                <div class="input-errors" v-for="(error, index) of v$.form.jabatan_id.$errors" :key="index">
                                    <div class="error-msg">{{ error.$message }}</div>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="">Tanggal Mulai</label>
                                <input type="date" class="form-control" v-model="v$.form.tanggal_mulai.$model" />
                                <div class="input-errors" v-for="(error, index) of v$.form.tanggal_mulai.$errors"
                                    :key="index">
                                    <div class="error-msg">{{ error.$message }}</div>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="">Tanggal Selesai</label>
                                <input type="date" class="form-control" v-model="v$.form.tanggal_selesai.$model" />
                                <div class="input-errors" v-for="(error, index) of v$.form.tanggal_selesai.$errors"
                                    :key="index">
                                    <div class="error-msg">{{ error.$message }}</div>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="">Jenis Kerja Sama</label>
                                <select v-model="v$.form.jenis_kerja.$model" class="form-control">
                                    <option v-for="(jenis, k) in jenisks" :key="k" :value="jenis.value">
                                        {{ jenis.text }}
                                    </option>
                                </select>
                                <div class="input-errors" v-for="(error, index) of v$.form.jenis_kerja.$errors"
                                    :key="index">
                                    <div class="error-msg">{{ error.$message }}</div>
                                </div>
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
import useVuelidate from '@vuelidate/core'
import { required } from '@vuelidate/validators'
export default {
    setup() {
        return { v$: useVuelidate() }
    },
    data() {

        return {
            form: {
                tanggal_surat: "",
                tanggal_mulai: "",
                tanggal_selesai: "",
                pegawai_id: "",
                jabatan_id: "",
                jenis_kerja: "",
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
    validations() {
        return {
            form: {
                tanggal_surat: { required },
                tanggal_mulai: { required },
                tanggal_selesai: { required },
                pegawai_id: { required },
                jabatan_id: { required },
                jenis_kerja: { required },
            },
        }
    },
    created() {
        this.pegawaiList();
        this.jabatanList();
    },
    methods: {
        addData() {
            this.v$.$validate()

            if (!this.v$.$error) {
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

                alert('Form successfully submitted.')
            } else {
                alert('Form failed validation')
            }
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
