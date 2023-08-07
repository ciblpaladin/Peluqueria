import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './Modules/Home/Login/login.component';

const routes: Routes = [
  {path: "", redirectTo: "login", pathMatch:"full"},
  {path: "login", component: LoginComponent 
  },
  {path:"home",
    loadChildren: ()=>import("./Modules/Home/home.module").then(m=>m.HomeModule)},
  {path:"**", component:LoginComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
