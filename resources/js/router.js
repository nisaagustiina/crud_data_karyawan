import { createRouter, createWebHistory } from "vue-router";

import Read from "./components/Read";
import Create from "./components/Create";
import Update from "./components/Update";
import Pegawai from "./components/Pegawai";

const routes = [
    {
        path: "/",
        name: "read",
        component: Read,
    },
    {
        path: "/create",
        name: "create",
        component: Create,
    },
    {
        path: "/update/:id",
        name: "update",
        component: Update,
    },
    {
        path: "/pegawai",
        name: "pegawai",
        component: Pegawai,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
