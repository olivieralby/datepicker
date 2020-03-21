
export default class Autogrow extends HTMLTextAreaElement{

    constructor(){
        super()
        this.onFocus = this.onFocus.bind(this)
        this.autogrow = this.autogrow.bind(this)

    }
    /**
     * Appel des evenements focus et input
     */
    connectedCallback(){
        this.addEventListener('focus',this.onFocus)
        this.addEventListener('input',this.autogrow)
    }

    disconnectedCallback(){

    }
    /**
     * Desactive le resize de la textarea appel de la function autogrow et suppression l'ecouteur d'evenement
     */
    onFocus(){
        this.style.resize = 'none'
        this.autogrow()
        this.removeEventListener('focus',this.onFocus)
    }
    /**
     * Redimensionne la textarea
     */
    autogrow(){
        this.style.height = 'auto'
        this.style.overflow = 'hidden'
        this.style.height = this.scrollHeight + 'px'
    }
}
customElements.define('textarea-autogrow',Autogrow,{extends:'textarea'})
