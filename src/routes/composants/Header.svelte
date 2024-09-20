<script>
	import {
		Collapse,
		Nav,
		Navbar,
		NavbarBrand,
		NavbarToggler,
		NavItem,
		NavLink,
		Dropdown,
		DropdownMenu,
		DropdownToggle,
		DropdownItem
	} from '@sveltestrap/sveltestrap';

	let isOpen = false;

	function toggle() {
		isOpen = !isOpen;
	}

	let isOpen2 = false;

 
  function handleUpdate(event) {
    isOpen2 = event.detail.isOpen2;
  }
</script>
<Navbar color="white" light expand="md" >
	<NavbarBrand  href="/" class="me-auto"><img style="height:150px; display:flex;float:left;" src="src/lib/images/WhatsApp Image 2024-09-05 at 11.36.21.jpeg" alt=""></NavbarBrand>
	<NavbarToggler on:click={() => (isOpen = !isOpen)} />
	<Collapse {isOpen2} navbar expand="md" on:update={handleUpdate}>
	  <Nav class="ms-auto" navbar>
		  <Dropdown nav inNavbar>
			<DropdownToggle style="font-size:1.2rem; margin-right:20px;" nav caret>Le Parc Football Club</DropdownToggle>
			<DropdownMenu end>
			  <DropdownItem href="Accueil" on:click={toggle}>Accueil</DropdownItem>
			  <DropdownItem href="Le Parc Fc" on:click={toggle}>Qui sommes nous ?</DropdownItem>
			  <DropdownItem href="Notre staff" on:click={toggle}>Notre staff </DropdownItem>
			  <DropdownItem href="Planning des entrainements" on:click={toggle}>Planning des entraînements </DropdownItem>
			  <DropdownItem divider />
			  <DropdownItem>Reset</DropdownItem>
			</DropdownMenu>
		</Dropdown>
			<Dropdown nav inNavbar>
			<DropdownToggle style="font-size:1.2rem; margin-right:20px;" nav caret>Pôle performance</DropdownToggle>
			<DropdownMenu end>
			  <DropdownItem href="/" on:click={toggle}>Stage</DropdownItem>
			  <DropdownItem href="/" on:click={toggle}>Spécifique aux postes</DropdownItem>
			  <DropdownItem href="/" on:click={toggle}>Préparation physiques</DropdownItem>
			  <DropdownItem href="/" on:click={toggle}>Préparation mentales</DropdownItem>
			  <DropdownItem divider />
			  <DropdownItem>Reset</DropdownItem>
			</DropdownMenu>
		  </Dropdown>
		  <Dropdown nav inNavbar>
			<DropdownToggle style="font-size:1.2rem; margin-right:20px;" nav caret>Espaces joueurs</DropdownToggle>
			<DropdownMenu end>
			  <DropdownItem href="Liste_joueurs" on:click={toggle}>Fiche joueurs</DropdownItem>
			  <DropdownItem href="evaluation_joueurs" on:click={toggle}>Demander une évaluation</DropdownItem>
			  <DropdownItem divider />
			  <DropdownItem>Reset</DropdownItem>
			</DropdownMenu>
		  </Dropdown>
		<Dropdown nav inNavbar>
		  <DropdownToggle style="font-size:1.2rem; margin-right:20px;" nav caret>Espaces Dirigeant</DropdownToggle>
		  <DropdownMenu end>
			<DropdownItem href="Liste_joueurs" on:click={toggle}>Liste joueurs</DropdownItem>
			<DropdownItem href="Nos equipes" on:click={toggle}>Nos équipes</DropdownItem>
			<DropdownItem href="Fiche_equipes" on:click={toggle}>Fiche Equipe</DropdownItem>
			<DropdownItem href="Liste_évènements" on:click={toggle}>Liste évènement</DropdownItem>
			<DropdownItem divider />
			<DropdownItem>Reset</DropdownItem>
		  </DropdownMenu>
		</Dropdown>
		<Dropdown nav inNavbar>
			<DropdownToggle style="font-size:1.2rem; margin-right:20px;" nav caret>Espaces Admin</DropdownToggle>
			<DropdownMenu end>
			  <DropdownItem href="creation_personne" on:click={toggle}>Création personnes</DropdownItem>
			  <DropdownItem href="creation_equipes" on:click={toggle}>Création Equipes</DropdownItem>
			  <DropdownItem href="creation_evenement" on:click={toggle}>Création Évènements </DropdownItem>
			  <DropdownItem divider />
			  <DropdownItem>Reset</DropdownItem>
			</DropdownMenu>
		  </Dropdown>
		  <NavItem style="color:red;">
			<NavLink style=" font-size:1.2rem; color:red; margin-right:30px;" href="Contact_nous" on:click={toggle}>Nous contacter</NavLink>
		  </NavItem>
	  </Nav>
	</Collapse>
  </Navbar>
<hr/>

