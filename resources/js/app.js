import './bootstrap';

import '../sass/app.scss';
import { createApp } from 'vue';
import router from './router';
import App from './components/App.vue';
// import About from './components/About.vue';
// import Work from './components/Work.vue';
// import Career from './components/Career.vue';
// import Projects from './components/Projects.vue';

// const app = createApp(App);

// app.use(router);

// app.mount('#app');

const app = document.querySelector('#app');
if (app) {
  createApp(App).use(router).mount(app);
}

// const about = document.querySelector('#about');
// if (about) {
//   createApp(About).use(router).mount(about);
// }

// const work = document.querySelector('#work');
// if (work) {
//   createApp(Work).use(router).mount(work);
// }

// const career = document.querySelector('#career');
// if (career) {
//   createApp(Career).use(router).mount(career);
// }

// const projects = document.querySelector('#projects');
// if (projects) {
//   createApp(Projects).use(router).mount(projects);
// }