'use client'
import { useState } from "react"
import { CreatePost } from "../services/posts"

export default () => {

    const [form, setForm] = useState({
        title: '',
        content: ''
    })

    const handleChangeTitle = (e) => {
        setForm({...form, title: e.target.value})
    }

    const handleChangeContent = (e) => {
        setForm({...form, content: e.target.value})
    }

    const handleSubmit = async () => {
        if (!form.title || !form.content) {
            alert('Debes llenar los campos titulo y descripcion')
            return
        }

        const response = await CreatePost(form.title, form.content)

        if(response.success) {
            location.reload()
            return
        }

        alert(response.errorMessage)

    }

    return (<div className="flex items-center flex-col gap-[20px] pt-[20px]">
        <div className="w-[300px]">
            
            <h2 className="text-4xl font-bold dark:text-white">Crear POST</h2>

        </div>
        <div className="w-[300px]">
            <label htmlFor="titulo" className="block py-2 text-gray-500">
                Titulo
            </label>
            <div className="flex items-center text-gray-400 border rounded-md">
                <input 
                    type="text"
                    placeholder="Titulo"
                    id="titulo"
                    className="w-full p-2.5 ml-2 bg-transparent outline-none"
                    onChange={handleChangeTitle}
                />
            </div>
        </div>
        <div className="w-[300px]">
            <div className="flex items-center text-gray-400 border rounded-md">
                <input 
                    type="text"
                    placeholder="descripcion"
                    id="titulo"
                    className="w-full p-2.5 ml-2 bg-transparent outline-none"
                    onChange={handleChangeContent}
                />
            </div>
        </div>
        <button className="w-[300px] px-4 py-2 text-indigo-600 bg-indigo-50 rounded-lg duration-150 hover:bg-indigo-100 active:bg-indigo-200" onClick={handleSubmit} >
            Crear Post
        </button>
    </div>)
}