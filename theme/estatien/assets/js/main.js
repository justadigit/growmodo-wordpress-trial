(function () {
	const menuToggle = document.querySelector('.menu-toggle');
	const nav = document.querySelector('.primary-nav');

	if (menuToggle && nav) {
		const closeMenu = function () {
			menuToggle.setAttribute('aria-expanded', 'false');
			nav.classList.remove('is-open');
			document.body.classList.remove('menu-open');
		};

		menuToggle.addEventListener('click', function () {
			const expanded = menuToggle.getAttribute('aria-expanded') === 'true';
			menuToggle.setAttribute('aria-expanded', String(!expanded));
			nav.classList.toggle('is-open', !expanded);
			document.body.classList.toggle('menu-open', !expanded);
		});

		nav.querySelectorAll('a').forEach(function (link) {
			link.addEventListener('click', closeMenu);
		});

		document.addEventListener('keydown', function (event) {
			if (event.key === 'Escape') {
				closeMenu();
			}
		});
	}

	document.querySelectorAll('.faq-card button').forEach(function (button) {
		const card = button.closest('.faq-card');
		const answer = card ? card.querySelector('.faq-answer') : null;

		if (answer) {
			answer.hidden = button.getAttribute('aria-expanded') !== 'true';
		}

		button.addEventListener('click', function () {
			const expanded = button.getAttribute('aria-expanded') === 'true';

			button.setAttribute('aria-expanded', String(!expanded));
			if (answer) {
				answer.hidden = expanded;
			}
		});
	});
})();
