import Vue from 'vue'
import UserComponent from "./user.component";
new Vue({
   el: '#app',
   data: {
       message: 'Hello Vue!'
   },
   components: {
       UserComponent
   },
   template: `
     <div>
     <h1>{{ message }}</h1>
     <UserComponent/>
     </div>`
})
