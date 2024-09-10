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
		<NavItem>
			<NavLink href="Accueil" on:click={toggle}>Accueil</NavLink>
		</NavItem>
		<NavItem>
			<NavLink  href="Actualités du club" on:click={toggle}>Actualités du club</NavLink>
		</NavItem>
		<Dropdown nav inNavbar>
		  <DropdownToggle nav caret>Espace joueurs</DropdownToggle>
		  <DropdownMenu end>
			<DropdownItem><NavLink href="Liste_joueurs" on:click={toggle}>Liste des joueurs</NavLink></DropdownItem>
			<DropdownItem><NavLink href="evaluation_joueurs" on:click={toggle}>Evaluation</NavLink></DropdownItem>
			<DropdownItem divider />
			<DropdownItem>Reset</DropdownItem>
		  </DropdownMenu>
		</Dropdown>
	  </Nav>
	</Collapse>
  </Navbar>
<hr/>
<!--<Navbar style="height:200px; background-color:white; border-bottom: 10px solid black;" >
	<NavbarBrand  href="/" class="me-auto"><img style="height:150px; display:flex; margin: 20px auto;" src="src/lib/images/WhatsApp Image 2024-09-05 at 11.36.21.jpeg" alt=""></NavbarBrand>
	<NavbarToggler on:click={toggle} class="me-2" />
	<Collapse {isOpen} navbar>
		<Nav navbar>
			<NavItem>
				<NavLink style="font-size:1.3rem; color:aqua;" href="Accueil" on:click={toggle}>Accueil</NavLink>
			</NavItem>

			<NavItem>
				<NavLink style="font-size:1.3rem; color:aqua;"  href="Actualités du club" on:click={toggle}>Actualités du club</NavLink>
			</NavItem>
			<NavItem>
				<NavLink style="font-size:1.3rem; color:aqua;"  href="Liste_joueurs" on:click={toggle}>Liste des joueurs</NavLink>
			</NavItem>
			<NavItem>
				<NavLink style="font-size:1.3rem; color:aqua;"  href="creation_equipes" on:click={toggle}>Espace Equipes</NavLink>
			</NavItem>
			<NavItem>
				<NavLink style="font-size:1.3rem; color:aqua;"  href="creation_evenement" on:click={toggle}>Espace Évènements</NavLink>
			</NavItem>
			<NavItem>
				<NavLink style="font-size:1.3rem; color:aqua;"  href="creation_personne" on:click={toggle}>Creation personne</NavLink>
			</NavItem>
			<NavItem>
				<NavLink style="font-size:1.3rem; color:aqua;"  href="evaluation_joueurs" on:click={toggle}>Evaluation</NavLink>
			</NavItem>
			<NavItem>
				<NavLink style="font-size:1.3rem; color:aqua;"  href="fiche_equipes" on:click={toggle}>equipe</NavLink>
			</NavItem>
		</Nav>
	</Collapse>
</Navbar>-->
