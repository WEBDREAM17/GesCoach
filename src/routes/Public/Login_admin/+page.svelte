<script>
  import { onMount } from 'svelte';
  import { goto } from '$app/navigation';

  let isAuthenticated = false;
  let _servicepath = 'http://localhost/webservice/';

  onMount(() => {
      authenticate();
  });

  async function checkAuth() {
      try {

          const response = await fetch('http://localhost/webservice/protected_endpoint.php', {
          method: 'GET',
          // Utilisez 'same-origin' pour les requêtes locales (HTTP)
          // et 'include' en production pour autoriser les requêtes cross-origin avec les cookies.
          credentials: window.location.hostname === 'localhost' ? 'same-origin' : 'include'
          });
          //const response = await fetch('http://localhost/webservice/protected_endpoint.php', {
            //  method: 'GET',
              //credentials: 'include',
          //});
          console.log(response);
          if (response.ok) {
              const data = await response.json();
              isAuthenticated = true;
          } else {
              //goto('/login'); // Redirection si non authentifié
              console.log('echec');
          }
      } catch (error) {
          console.error('Erreur lors de la vérification de l\'authentification', error);
          //goto('/login_'); // Redirection si une erreur survient
      }
  }

  async function fetchProtectedData() {
      try {
          const response = await fetch('http://localhost/webservice/protected_endpoint.php', {
              method: 'GET',
              credentials: window.location.hostname === 'localhost' ? 'same-origin' : 'include'
              //credentials: 'include', // Autorise l'envoi des cookies avec la requête
          });

          if (response.ok) {
              const data = await response.json();
              console.log("Données protégées:", data);
          } else if (response.status === 401) {
              console.error("Erreur 401 : Non autorisé. L'utilisateur n'est pas authentifié.");
          } else {
              console.error("Erreur : ", response.status, response.statusText);
          }
      } catch (error) {
          console.error("Erreur réseau ou autre problème :", error);
      }
  }

  async function authenticate(){
      try{
          const updateRoute = _servicepath + 'protected_endpoint.php';
          const data = new FormData();

    let res = await fetch(updateRoute, {
      method: 'POST',
      body: data
    });

          res = await res.json();
          console.log('res.data : ' + res.data);
          if (res.status == '1') {
              isAuthenticated = true;
          }
          else
          {
              isAuthenticated = false;
          }
      }
      catch(error){
          console.error("Erreur réseau ou autre problème :", error);
      }
  }
  
</script>

{#if isAuthenticated}
  <h1>Bienvenue dans la zone protégée</h1>
{:else}
  <p>Redirection vers la page de connexion...</p>
{/if}

<h1>Login Admin</h1>
<Card style="background-color:black;">
  <Row>
    <Col style="margin-top:50px;" sm="12" md={{ size: 6, offset: 3 }}>
      <Label style="color:white;">Identifiant</Label>
      <Input></Input>
    </Col>
    <Col sm="8" md={{ size: 6, offset: 3 }}>
      <Label style="color:white;">Mot de passe</Label>
      <Input></Input>
    </Col>
    <Col sm="12" md={{ size: 6, offset: 3 }}>
      <a style="color:red;"href="/">Mot de passe oublié</a>
    </Col>
      
      <Col sm="6" md={{ size: 6, offset: 3 }}>
        <Button style="margin-bottom:50px;">Se connecter</Button>
      </Col>
    
  </Row>
</Card>





