import axios from "axios"

export async function Login(email: string, password: string) {

    const response = await axios.post('http://localhost:8000/api/login',
        {email, password}
    )

    console.log(response.data)
}