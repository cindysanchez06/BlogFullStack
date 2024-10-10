import CardPost from "../components/card-post"
import CreatePost from "../components/create-post"
import { GetPosts } from "../services/posts"

export default async () => {
    
    const posts = await GetPosts()
    return (<div>
        <CreatePost />
        <div className="flex gap-[10px] pt-[10px] flex-wrap">
            {posts.map(({title, content}) => <CardPost title={title} description={content} />)}
        </div>
    </div>)
}