<script>
	import {
		Collapse,
		Nav,Navbar,NavbarBrand,NavbarToggler,NavItem,NavLink,
		Dropdown,DropdownMenu,DropdownToggle,DropdownItem
	} from '@sveltestrap/sveltestrap';
	import auth from '../authService';
	import { isAuthenticated, user, user_tasks, tasks } from "../store";
	import { onMount } from 'svelte';

	let isOpen = false;
	let auth0Client;

	onMount(() => {
		loginInit();
	});
	
	async function loginInit()
	{
	  auth0Client = await auth.createClient();
  
	  isAuthenticated.set(await auth0Client.isAuthenticated());
	  user.set(await auth0Client.getUser());
	}

	function toggle() {
		isOpen = !isOpen;
	}

	let isOpen2 = false;

	function login() {
	  auth.loginWithPopup(auth0Client);
	}
  
	function logout() {
	  auth.logout(auth0Client);
	}
 
	function handleUpdate(event) {
		
		isOpen2 = event.detail.isOpen2;
		
	}
</script>
<Navbar color="white" light expand="md" >
	<NavbarBrand  href="/" class="me-auto"><img src="/images/logopfc.jpeg" alt=""></NavbarBrand>
	<NavbarToggler on:click={() => (isOpen = !isOpen)} />
	<Collapse {isOpen} navbar expand="md" on:update={handleUpdate}>
	  <Nav class="ms-auto" navbar>
		  <Dropdown nav inNavbar>
			<DropdownToggle style="font-size:1.2rem; margin-right:20px;" nav caret>Le Parc Football Club</DropdownToggle>
			<DropdownMenu end>
			  <DropdownItem href="/Public/Le Parc Fc" on:click={toggle}>Qui sommes nous ?</DropdownItem>
			  <DropdownItem href="/Public/Notre staff" on:click={toggle}>Notre staff </DropdownItem>
			  <DropdownItem href="/Public/Nos equipes" on:click={toggle}>Nos équipes</DropdownItem>
			  <DropdownItem href="/Public/Planning des entrainements" on:click={toggle}>Planning des entraînements </DropdownItem>
			  <DropdownItem href="/Public/Liste_évènements" on:click={toggle}>Liste évènement</DropdownItem>
			</DropdownMenu>
		</Dropdown>
		  <NavItem style="color:red;">
			<NavLink style=" font-size:1.2rem; margin-right:30px;" href="/Public/Pôle performance" on:click={toggle}>Pôle performance</NavLink>
		  </NavItem>
		  <Dropdown nav inNavbar>
			<DropdownToggle style="font-size:1.2rem; margin-right:20px; display:none;" nav caret>Espaces joueurs</DropdownToggle>
			<DropdownMenu end>
			  <DropdownItem href="/Joueurs/Liste_joueurs" on:click={toggle}>Fiche joueurs</DropdownItem>
			 
			</DropdownMenu>
		  </Dropdown>
		 {#if $isAuthenticated}
		 <Dropdown nav inNavbar>
			<DropdownToggle style="font-size:1.2rem; margin-right:20px;" nav caret>Espaces Admin</DropdownToggle>
			<DropdownMenu end>
			  <DropdownItem href="/Admin/creation_personne" on:click={toggle}>Création personnes</DropdownItem>
			  <DropdownItem href="/Admin/creation_equipes" on:click={toggle}>Création Equipes</DropdownItem>
			  <DropdownItem href="/Admin/creation_evenement" on:click={toggle}>Création Évènements </DropdownItem>
			  <DropdownItem href="/Admin/Liste_joueurs" on:click={toggle}>Liste joueurs</DropdownItem>
			<DropdownItem href="/Admin/Nos equipes" on:click={toggle}>Nos équipes</DropdownItem>
			<DropdownItem href="/Admin/dashboard" on:click={toggle}>dashboard</DropdownItem>
			</DropdownMenu>
		  </Dropdown>
		  {/if}
		  {#if !$isAuthenticated}
		  <Dropdown nav inNavbar>
			<DropdownToggle style="font-size:1.2rem; margin-right:20px;" on:click={login}>Se connecter</DropdownToggle>
			<!--<DropdownMenu end>
			  <DropdownItem href="/Public/Login_admin" on:click={login}>Admin</DropdownItem>
			  <DropdownItem on:click={login}>Admin</DropdownItem>
			  <DropdownItem href="/Public/Login_joueurs" on:click={toggle}>Joueurs</DropdownItem>
			</DropdownMenu>-->
		  </Dropdown>
		  {:else} 
		  <Dropdown nav inNavbar>
			<DropdownToggle style="font-size:1.2rem; margin-right:20px;" on:click={logout}>Déconnection</DropdownToggle>			
		  </Dropdown>
		  {/if}

		  <NavItem style="color:red;">
			<NavLink style=" font-size:1.2rem; color:red; margin-right:30px;" href="Contact_nous" on:click={toggle}>Nous contacter</NavLink>
		  </NavItem>
	  </Nav>
	</Collapse>
  </Navbar>
<hr/>

<style>
	
	img {
		height:150px; 
		display:flex;
		float:left;
	}
</style>