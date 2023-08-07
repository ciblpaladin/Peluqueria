import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ClientsComponent } from './clients.component';

const routes: Routes = [
  {path: "", component: ClientsComponent},
  {path:"form_client", loadChildren: ()=>import("./Form-client/form-client.module").then(m => m.FormClientModule)}

];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ClientRoutingModule { }
