
//Permet d'afficher une pop-up editer avec la technologie ajax
export default class Edit{

    constructor(element){
        if(element==null){
            return null
        }
        this.content = element.querySelector('.js-content')

        this.bindEvents()
    }
    bindEvents(){
        let links = document.querySelectorAll('.edit' )
        links.forEach(link=>{
            link.addEventListener('click',e=>{
                e.preventDefault()
                this.loadUrl(link.getAttribute('href'))
            })
        })
    }
    async loadUrl(url){
        const response = await fetch(url,{
            headers:{
                'X-Requested-with':'XMLHttpRequest'
            }
        })
        if(response.status>=200 && response.status < 300){
            const data = await response.json()
            this.content.innerHTML = data.content
            this.close()
        }
    }
     
    close(){
        document.querySelector('.button').addEventListener('click',()=>{
            this.content.innerHTML = ""
        })
    }
   

}