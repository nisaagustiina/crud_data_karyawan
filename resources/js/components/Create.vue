<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>Create Data</h4>
                        <hr />
                        <Form
                            @submit.prevent="addData()"
                            :validation-schema="schema"
                            v-slot="{ errors }"
                        >
                            <div class="form-group">
                                <label for="">Tanggal Surat</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    v-model="form.tanggal_surat"
                                    :class="{ 'is-invalid': errors.tanggal_surat }"
                                />
                                <div class="invalid-feedback">{{errors.tanggal_surat}}</div>
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
                        </Form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Form, Field } from "vee-validate";
import * as Yup from "yup";
export default {
    components: {
        Form,
        Field,
    },
    data() {
        const schema = Yup.object().shape({
            tanggal_surat: Yup.date().required("Tanggal Surat is required"),
            tanggal_mulai: Yup.string().required("Tanggal Mulai is required"),
            tanggal_selesai: Yup.string().required(
                "Tanggal Selesai is required"
            ),
            pegawai_id: Yup.string().required("Pegawai is required"),
            jabatan_id: Yup.string().required("Jabatan is required"),
            jenis_kerja: Yup.string().required("Jenis Kerja Sama is required"),
        });

        return {
            schema,
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
