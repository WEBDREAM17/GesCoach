<script>
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
        goto('Accueil');
    }
    //==============================================================================//
    //            FIN A METTRE SUR TOUTES LES PAGES PROTEGEES                       //
    //==============================================================================//
</script>
<!--SI ON EST AUTHENTIFIE ON ACCEDE AU CONTENU SINON ON EST REDIRIGE VERS LA PAGE DE CONNEXION-->
{#if isAuthenticated}
    <h1>Bienvenue {userName}</h1>
    <Button on:click={deconnecter}>Déconnexion</Button>
{:else}
    <p>Redirection vers la page de connexion...</p>
{/if}
