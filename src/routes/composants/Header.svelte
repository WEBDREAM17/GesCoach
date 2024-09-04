<script>
	import {
		Collapse,
		Nav,
		Navbar,
		NavbarBrand,
		NavbarToggler,
		NavItem,
		NavLink
	} from '@sveltestrap/sveltestrap';

	let isOpen = false;

	function toggle() {
		isOpen = !isOpen;
	}
</script>

<Navbar color="dark" theme="dark">
	<NavbarBrand href="/" class="me-auto">Parc Football Club</NavbarBrand>
	<NavbarToggler on:click={toggle} class="me-2" />
	<Collapse {isOpen} navbar>
		<Nav navbar>
			<NavItem>
				<NavLink style="font-size:1.3rem; color:aqua;" href="Accueil" on:click={toggle}>Accueil</NavLink>
			</NavItem>
			<NavItem>
				<NavLink style="font-size:1.3rem; color:aqua;"  href="Home" on:click={toggle}>Home</NavLink>
			</NavItem>
			<NavItem>
				<NavLink style="font-size:1.3rem; color:aqua;"  href="Actualités du club" on:click={toggle}>Actualités du club</NavLink>
			</NavItem>
			<NavItem>
				<NavLink style="font-size:1.3rem; color:aqua;"  href="Notre staff" on:click={toggle}>Notre staff</NavLink>
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
		</Nav>
	</Collapse>
</Navbar>
