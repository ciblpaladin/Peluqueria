
import { User } from "src/app/Modules/Users/interfaces/User"
export interface ResponseInterface{

    Messague : string
    password_status : boolean
    user_status : boolean
    user_db: User
    
}

