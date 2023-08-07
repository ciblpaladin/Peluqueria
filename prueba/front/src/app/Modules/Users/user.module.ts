import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { UserComponent } from './user.component';
import { UserRoutingModule } from './user-routing.module';
import { CrudService } from 'src/app/Global_Services/crud.service';
import {HttpClientModule } from '@angular/common/http';
import { UserService } from './services/user.service';
import { FormUserRoutingModule } from './form-user/form-routing.module';
import { PasswordValidate } from 'src/app/Global_Services/Security/PasswordValidate.service';
import { FormsModule } from '@angular/forms';
import { NgxPaginationModule } from 'ngx-pagination';
import { BaseListClassService } from 'src/app/Global_Services/Component-list/base-list-class.service';


@NgModule({
  declarations: [UserComponent],
  imports: [
    CommonModule,
    UserRoutingModule,
    HttpClientModule,
    FormUserRoutingModule,
    FormsModule,
    NgxPaginationModule
  ],
  providers:[CrudService, UserService, PasswordValidate, BaseListClassService]
})
export class UserModule { }
