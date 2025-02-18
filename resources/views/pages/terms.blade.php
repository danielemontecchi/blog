<?php

use function Laravel\Folio\name;

name('pages.terms');
?>

<x-layouts.app>
	<div class="bg-white px-6 py-32 lg:px-8">
		<div class="prose mx-auto max-w-3xl text-base/7 text-gray-700">
			<h1>Terms and Conditions</h1>

			<h2>1. Introduction</h2>
			<p>Welcome to our platform. These Terms and Conditions outline the rules and regulations for the use of our
				website and services. By accessing or using our services, you agree to comply with these terms. If you
				do not agree with any part of these terms, you must not use our services.</p>

			<h2>2. Definitions</h2>
			<ul>
				<li><strong>"Website"</strong> refers to the platform where our services are provided.</li>
				<li><strong>"User"</strong> refers to any person accessing or using the website.</li>
				<li><strong>"Content"</strong> includes all text, images, multimedia, and other materials on the
					website.
				</li>
				<li><strong>"Services"</strong> refers to any functionality, features, or interactions provided by the
					website.
				</li>
			</ul>

			<h2>3. User Responsibilities</h2>
			<p>By using our website, you agree to:</p>
			<ul>
				<li>Provide accurate and up-to-date information if required.</li>
				<li>Use the website for lawful purposes only.</li>
				<li>Respect intellectual property rights and not copy, distribute, or reproduce content without
					permission.
				</li>
				<li>Avoid actions that may compromise the security or functionality of the website.</li>
			</ul>

			<h2>4. Intellectual Property</h2>
			<p>All content, trademarks, logos, and other intellectual property displayed on the website are the property
				of their respective owners. Users are not allowed to copy, modify, or distribute any content without
				prior written consent.</p>

			<h2>5. Privacy Policy</h2>
			<p>Our Privacy Policy governs the collection and use of personal data. By using our website, you agree to
				our data processing practices as outlined in the Privacy Policy.</p>

			<h2>6. Limitation of Liability</h2>
			<p>We do not guarantee the uninterrupted or error-free operation of our website. We shall not be liable for
				any direct, indirect, or incidental damages resulting from the use or inability to use our services.</p>

			<h2>7. External Links</h2>
			<p>Our website may contain links to third-party websites. We are not responsible for the content, policies,
				or practices of any linked site. Users should review third-party terms before engaging with external
				platforms.</p>

			<h2>8. Changes to These Terms</h2>
			<p>We reserve the right to modify these Terms and Conditions at any time. Any updates will be posted on this
				page. Continued use of the website after changes implies acceptance of the revised terms.</p>

			<h2>9. Termination</h2>
			<p>We may suspend or terminate user access to the website if any violations of these terms occur. Actions
				such as unauthorized access, misuse, or fraudulent activities will result in immediate suspension.</p>

			<h2>10. Governing Law</h2>
			<p>These Terms and Conditions are governed by and interpreted according to the laws of [Jurisdiction]. Any
				disputes arising from these terms shall be settled in the appropriate courts of [Jurisdiction].</p>

			<h2>11. Contact Information</h2>
			<p>For any inquiries regarding these Terms and Conditions, you can contact us at:</p>
			<p><strong>Email:</strong> {{config('blog.credits.email')}}</p>
			<p><strong>Address:</strong> {{config('blog.credits.address')}}</p>
		</div>
	</div>
</x-layouts.app>
