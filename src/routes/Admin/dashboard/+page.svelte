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
    <h1>Bienvenue {userName} dans ton dashboard</h1>
{:else}
    <p>Redirection vers la page de connexion...</p>
{/if}

    <div class="row1">
        <a href="/Admin/creation_personne"><img src="/src/lib/images/8.jpg" alt=""></a>
        <a href="/Admin/Liste_joueurs"> <img src="/src/lib/images/3.jpg" alt=""></a>
        <a href="/Admin/evaluation_joueurs"><img src="/src/lib/images/5.jpg" alt=""></a>
    </div>
   <div class="row2">
    <a href="/Admin/creation_equipe"><img src="/src/lib/images/4.jpg" alt=""></a>
    <a href="/Admin/Fiche_equipes"><img src="/src/lib/images/3.jpg" alt=""></a>
    <a href="/Admin/creation_evenement"><img src="/src/lib/images/9.jpg" alt=""></a>
   </div>
   <Button on:click={deconnecter}>Déconnexion</Button>


<style>
   
h1{
    color: rgb(0, 0, 0);
    font-size: 4rem;
    text-align: center;

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


</style>



