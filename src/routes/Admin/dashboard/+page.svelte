<script>
	import { Image, Col, Row } from '@sveltestrap/sveltestrap';
    import { onMount } from 'svelte';
    import { goto } from '$app/navigation';
	import { Button } from '@sveltestrap/sveltestrap';
	
    let isAuthenticated = false;
    let userName = '';

    onMount(() => {
        //==============================================================================//
        //            A METTRE SUR TOUTES LES PAGES PROTEGEES                           //
        //==============================================================================//
        let cookie = getCookie('user');        
        if(cookie != null)
        {
            //On considère que l'utilisateur est connecté (non sécurisé pour le moment il faudra passer en https pour utiliser JWT)
            isAuthenticated = true;
            userName = cookie;
        }
        else
        {
            //L'utilisateur n'est pas connecté, on redirige vers la page de login en passant l'url demandée en paramètre
            isAuthenticated = false;
            goto('/Public/Login_admin?request='+'../page_protegee');
        }
        //==============================================================================//
        //            FIN A METTRE SUR TOUTES LES PAGES PROTEGEES                       //
        //==============================================================================//
    });

    //==============================================================================//
    //            A METTRE SUR TOUTES LES PAGES PROTEGEES                           //
    //==============================================================================//
     // Fonction pour lire un cookie
    function getCookie(name) {
        let cookies = document.cookie.split(';');
        for (let cookie of cookies) {
            let [cookieName, cookieValue] = cookie.split('=').map(c => c.trim());
            if (cookieName === name) {
                return cookieValue;
            }
        }
        return null; // Retourne null si le cookie n'existe pas
    }

    // Fonction pour supprimer un cookie
    function deleteCookie(name) {
        document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";            
    }

    //Fonction à appeler au click sur déconnexion
    function deconnecter()
    {
        isAuthenticated = false;
        deleteCookie('user');
        goto('/');
    }

     //==============================================================================//
    //            FIN A METTRE SUR TOUTES LES PAGES PROTEGEES                       //
    //==============================================================================//
</script>
<!--SI ON EST AUTHENTIFIE ON ACCEDE AU CONTENU SINON ON EST REDIRIGE VERS LA PAGE DE CONNEXION-->


{#if isAuthenticated}
<div class="cardHeader" >
    <h1 class="title">Bienvenue {userName} dans ton dashboard</h1>
   <Button style="background-color:rgb(182, 219, 252);" on:click={deconnecter}><img class="deconnexion" src="/src/lib/images/2.png" alt=""></Button>
  </div>
{:else}
    <p>Redirection vers la page de connexion...</p>
{/if}

    <div class="row1">
        <a href="/Admin/creation_personne"><img src="/src/lib/images/image 2.png" alt="">Créer un Joueur</a>
        <a href="/Admin/Liste_joueurs"> <img src="/src/lib/images/image 7.png" alt="">Liste des joueurs</a>
        <a href="/Admin/evaluation_joueurs"><img src="/src/lib/images/datasoccer.png" alt="">Evaluer un joueur</a>
    </div>
   <div class="row2">
    <a href="/Admin/creation_equipes"><img src="/src/lib/images/image 3.png" alt="">Créer une équipe</a>
    <a href="/Admin/Nos equipes"><img src="/src/lib/images/image 6.png" alt="">Mon equipe</a>
    <a href="/Admin/creation_evenement"><img src="/src/lib/images/image 7.png" alt="">Créer un évènement</a>
   </div>
   <Button on:click={deconnecter}>Déconnexion</Button>


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



