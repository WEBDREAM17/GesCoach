<script>
  import { onMount } from 'svelte';
  import { goto } from '$app/navigation';
  import { Card, Label, Input, Col, Row, Button, Alert} from "@sveltestrap/sveltestrap";
  import { page} from '$app/stores';

  let isAuthenticated = false;
  let _servicepath = 'http://localhost/webservice/';
  let username = '';
  let password = '';
  let error = false;
  let page_demandee = '';
  
  


  onMount(() => {
  //   page_demandee =$page.url.searchParams.get('request');
  page_demandee = '/Admin/dashboard';
  });

  async function authenticate() {
    try {        
          const updateRoute = _servicepath + 'authentification.php';
          const data = new FormData();
          data.append('username', username);
          data.append('password', password);

          let res = await fetch(updateRoute, {
            method: 'POST',
            body: data
          });

          res = await res.json();

          if (res.status == '1') {
            error = false;
            let utilisateur = res.data;
            console.log(utilisateur);
            setCookie("user", utilisateur[0].username, 7);
            let userCookie = getCookie("user");
            console.log('cookie : ' + userCookie)
            goto(page_demandee);
          }
          else
          {
            error = true;
          }
    
      } 
      catch (error) {
          console.error('Erreur lors de la vérification de l\'authentification', error);          
      }
  } 

  function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
  }

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
  
</script>

{#if isAuthenticated}
  <h1>Bienvenue dans la zone protégée</h1>
{:else}
  <p>Redirection vers la page de connexion...</p>
{/if}

<h1>Admin</h1>
<form class="connexion" action="" >
  <div class="formulaire">
    <div>
      <label>Identifiant
      <input id="username" bind:value={username}>
  </div>
    <div>
      <label>
        Password
      <input type="password" id="password" bind:value={password}>
      </div>
  
    <div>
        <Button style="margin-bottom:50px;" on:click={authenticate}>Se connecter</Button>
      
      {#if error}
      <Col sm="6" md={{ size: 6, offset: 3 }}>
        <Alert color="danger">Identifiant ou mot de passe incorrect</Alert>
      </Col>
      {/if}
    </div>
  
  </div>
 
</form>





<style>
  
  label{
    margin-top:50px;
  }
  a {
    color:red;
  }
  button {

  }
  .connexion{
    background-color: rgb(182, 219, 252);
    
  }
  .formulaire {
    margin: auto 20px;
  }
  input{
    margin-left: 30px;

  }
</style>



