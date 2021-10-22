const Welcome = () => import('./components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */)
const nominaList = () => import('./components/nomina/List.vue' /* webpackChunkName: "resource/js/components/nomina/list" */)
const nominaCreate = () => import('./components/nomina/Add.vue' /* webpackChunkName: "resource/js/components/nomina/add" */)
const nominaEdit = () => import('./components/nomina/Edit.vue' /* webpackChunkName: "resource/js/components/nomina/edit" */)
const nominaShow = () => import('./components/nomina/Show.vue' /* webpackChunkName: "resource/js/components/nomina/show" */)

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'nominaList',
        path: '/nomina',
        component: nominaList
    },
    {
        name: 'nominaEdit',
        path: '/nomina/:id/edit',
        component: nominaEdit
    },
    {
        name: 'nominaShow',
        path: '/nomina/:id/show',
        component: nominaShow
    },
    {
        name: 'nominaAdd',
        path: '/nomina/add',
        component: nominaCreate
    }
]
