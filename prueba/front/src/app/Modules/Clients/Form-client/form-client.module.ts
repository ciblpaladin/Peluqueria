import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormClientComponent } from './form-client.component';
import { FormClientRoutingModule } from './form-client-routing.module';
import { ReactiveFormsModule } from '@angular/forms';
import { BaseComponentService } from 'src/app/Global_Services/base-component.service';


@NgModule({
  declarations: [FormClientComponent],
  imports: [
    CommonModule,
    FormClientRoutingModule,
    ReactiveFormsModule
  
  ],
  providers:[BaseComponentService]
})
export class FormClientModule { }
