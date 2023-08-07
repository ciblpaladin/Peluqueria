import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { FormClientComponent } from './form-client.component';


const routes: Routes = [
  {path: "form_clients/:accion", component: FormClientComponent },
  {path: "form_clients/:accion/:id", component: FormClientComponent}

];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class FormClientRoutingModule { }
