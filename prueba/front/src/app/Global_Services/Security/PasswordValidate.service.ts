import { Injectable } from '@angular/core';

@Injectable()
export class PasswordValidate{


    validate_equals(pass_in:string, pass_confirm: string){

        let sanizer_pass_in = pass_in.trim()
        let sanizer_pass_confirm = pass_confirm.trim()

        if(sanizer_pass_confirm !== sanizer_pass_in){

            return true

        }else{

            return false
        }
    }

}