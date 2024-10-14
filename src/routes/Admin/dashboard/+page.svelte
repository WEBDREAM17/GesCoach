<script>
	import { Image, Col, Row } from '@sveltestrap/sveltestrap';
    import { onMount } from 'svelte';
    import { goto } from '$app/navigation';
	
    import { isAuthenticated } from "../../store";
	
    
    let userName = '';

    onMount(() => {
       if(!$isAuthenticated)
       {
        goto('/Accueil');
       }
    });    
</script>
<!--SI ON EST AUTHENTIFIE ON ACCEDE AU CONTENU SINON ON EST REDIRIGE VERS LA PAGE DE CONNEXION-->


{#if isAuthenticated}
<div class="cardHeader" >
    <h1 class="title">Bienvenue {userName} dans ton dashboard</h1>
  </div>
{:else}
    <p>Redirection vers la page de connexion...</p>
{/if}

    <div class="row1">
        <a href="/Admin/creation_personne"><img src="/images/image 2.png" alt="">Créer un Joueur</a>
        <a href="/Admin/Liste_joueurs"> <img src="/images/image 7.png" alt="">Liste des joueurs</a>
        <a href="/Admin/evaluation_joueurs"><img src="/images/datasoccer.png" alt="">Evaluer un joueur</a>
    </div>
   <div class="row2">
    <a href="/Admin/creation_equipes"><img src="/images/image 3.png" alt="">Créer une équipe</a>
    <a href="/Admin/Nos equipes"><img src="/images/image 6.png" alt="">Mon equipe</a>
    <a href="/Admin/creation_evenement"><img src="/images/image 7.png" alt="">Créer un évènement</a>
   </div>
  


<style>
   .cardHeader{
    display: flex;
    justify-content: space-around;
    align-items: center;
    background-color:rgb(182, 219, 252);
    padding: 20px 10px;
      
    }
    .title {
      font-size:4rem;
       text-align: center;
       color:black;
    }

img {
    width: 400px;
    
}

.row1 {
    display: flex;
    justify-content: center;
    margin: 100px 0;
    gap: 20px;

}

.row2 {
    display: flex;
    justify-content: center;
    margin: 50px 0;
    gap: 20px;  

}
a {
    display: flex;
    flex-direction: column ;
    text-align: center;
    margin-top: 20px;
    text-decoration: none;
    color: black;
    font-size: 2rem;
}
.deconnexion{
    width: 50px;
    text-align: center;

}
</style>



