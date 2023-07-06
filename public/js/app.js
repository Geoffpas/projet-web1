import { ref } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'

export const commentaires = ref([])
export const commentaire = ref({
  texte: '',
  note: 0,
  noteImages: []
})

const remplirNoteImages = () => {
    const note = commentaire.value.note
    const noteArrondie = Math.round(note * 2) / 2
    const images = []

    for (let i = 0; i < Math.floor(noteArrondie); i++) {
        images.push('public/img/star.png')
    }

    if (noteArrondie % 1 !== 0) {
        images.push('public/img/star-half.png')
    }

    commentaire.value.noteImages = images
}

fetch('public/data/commentaires.json').then(resp => resp.json()).then(fichier => {
        commentaires.value = fichier
        commentaire.value = commentaires.value[0]
        remplirNoteImages()
    })

let indexCommentaire = 1

setInterval(() => {

    const commentaireActuel = commentaires.value[indexCommentaire]
    commentaire.value = commentaireActuel
    remplirNoteImages()

    indexCommentaire += 1
    if (indexCommentaire >= commentaires.value.length) {
    indexCommentaire = 0
    }

}, 5000)
