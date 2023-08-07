import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormUserComponent } from './form-user.component';
import { FormUserRoutingModule } from './form-routing.module';
import { UserModule } from '../user.module';
import { UserService } from '../services/user.service';
import { ReactiveFormsModule } from '@angular/forms';
import { PasswordValidate } from 'src/app/Global_Services/Security/PasswordValidate.service';
import { BaseComponentService } from 'src/app/Global_Services/base-component.service';

@NgModule({
  declarations: [FormUserComponent],
  imports: [
    CommonModule,
    FormUserRoutingModule,
    UserModule,
    ReactiveFormsModule,
    
  ],
  providers:[UserService,PasswordValidate,BaseComponentService]
})
export class FormUserModule { }
