import axios from "axios"
import { LOGIN } from "./constants"

export async function Login(email: string, password: string): Promise<{success: boolean, errorMessage?: string}> {

    try {
        const response = await axios.post(LOGIN,
            {email, password}
        )

        sessionStorage.setItem('token', response.data.token)
        return {
            success: true
        }
    } catch(e) {
        const {message} = e.response.data
        return {
            success: false,
            errorMessage : message
        }
    }
    

    
}