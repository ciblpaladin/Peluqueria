import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { FormUserComponent } from './form-user.component';

const routes: Routes = [
  {path: "form/:accion", component: FormUserComponent },
  {path: "form/:accion/:id", component: FormUserComponent}

];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class FormUserRoutingModule { }
