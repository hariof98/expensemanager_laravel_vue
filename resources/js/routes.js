import Home from './components/Home';
import Register from './components/Register';
import Login from './components/Login';
import Update from './components/Update';
import Reset from './components/Reset';
import Dashboard from './components/Dashboard';
import NotFound from './components/NotFound';
import Profile from './components/Profile';
import Expense from './components/Expense';
import Income from './components/Income';
import Daybook from './components/Daybook';
import Incomerecord from './components/Incomerecord';
import Editexpense from './components/Editexpense';
import axios from 'axios';


export default{
    mode: 'history',
    routes: [
        {path: '*', component: NotFound},
        {path: '/', component: Home, name: 'Home'},
        {path: '/register', component: Register},
        {path: '/login', component: Login, name: 'Login'},
        {path: '/editexpense', component: Editexpense, name: 'Editexpense'},
        {path: '/reset', component: Reset, name: 'Reset'},
        {path: '/update', component: Update, name: 'Update', beforeEnter: (to, form, next)=> {
            axios.get('/api/authenticated').then(() => {
               next()
            }).catch(() => {
                return next({ name: 'Login'})
            })
        }
    },

  

        {path: '/expense', component: Expense, name: 'Expense', beforeEnter: (to, form, next)=> {
            axios.get('/api/authenticated').then(() => {
               next()
            }).catch(() => {
                return next({ name: 'Login'})
            })
        }
    },

        {path: '/income', component: Income, name: 'Income', beforeEnter: (to, form, next)=> {
            axios.get('/api/authenticated').then(() => {
               next()
            }).catch(() => {
                return next({ name: 'Login'})
            })
        }
    },

        {path: '/daybook', component: Daybook, name: 'Daybook', beforeEnter: (to, form, next)=> {
            axios.get('/api/authenticated').then(() => {
               next()
            }).catch(() => {
                return next({ name: 'Login'})
            })
        }
    },

        {path: '/incomerecord', component: Incomerecord, name: 'Incomerecord', beforeEnter: (to, form, next)=> {
            axios.get('/api/authenticated').then(() => {
               next()
            }).catch(() => {
                return next({ name: 'Login'})
            })
        }
    },

        {path: '/profile', component: Profile, name: 'Profile', beforeEnter: (to, form, next)=> {
            axios.get('/api/authenticated').then(() => {
               next()
            }).catch(() => {
                return next({ name: 'Login'})
            })
        }
    },

        {path: '/dashboard',
         component: Dashboard,
          name: 'Dashboard',
         beforeEnter: (to, form, next)=> {
             axios.get('/api/authenticated').then(() => {
                next()
             }).catch(() => {
                 return next({ name: 'Login'})
             })
         }
        }
    ],
}