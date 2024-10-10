import axios from "axios"
import { CREATE_POST, GET_POST } from "./constants"

export async function CreatePost(title: string, content: string): Promise<{success: boolean, errorMessage?: string}> {
    try {

        const token = sessionStorage.getItem('token')

        if (!token) {
            return {
                success: false,
                errorMessage : 'Debes iniciar sesion primero'
            }
        }

        const response = await axios.post(CREATE_POST,
            {title, content, category_id: 1},
            {headers: {'Authorization': `Bearer ${token}`}}
        )

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

export async function GetPosts(): Promise<{id: number, title: string, content: string, created_at: string}[]> {
    try {
        const response = await axios.get(GET_POST)
        return response.data
    } catch(e) {
        return []
    }
}