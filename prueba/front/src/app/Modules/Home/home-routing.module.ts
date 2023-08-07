import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home.component';

const routes: Routes = [
  {path: "", 
    component: HomeComponent,
    children:[
      {path:"users", loadChildren: ()=>import("../Users/user.module").then(m => m.UserModule)},
      {path:"clients", loadChildren: ()=>import("../Clients/clients.module").then(m => m.ClientsModule)}
    ]  
  }
  

];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class HomeRoutingModule { }
