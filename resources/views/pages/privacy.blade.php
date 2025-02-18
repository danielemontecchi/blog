<?php

use function Laravel\Folio\name;

name('pages.privacy');
?>

<x-layouts.app>
	<div class="bg-white px-6 py-32 lg:px-8">
		<div class="prose mx-auto max-w-3xl text-base/7 text-gray-700">
			<h1>Privacy Policy</h1>

			<h2>1. Introduction</h2>
			<p>Welcome to our Privacy Policy. Your privacy is important to us, and this document outlines how we
				collect, use, and protect your personal data when you use our website and services.</p>

			<h2>2. Information We Collect</h2>
			<p>We may collect the following types of information:</p>
			<ul>
				<li><strong>Personal Information:</strong> Name, email address, contact details, and other identifiable
					information you provide voluntarily.
				</li>
				<li><strong>Usage Data:</strong> Information on how you interact with our website, such as IP address,
					browser type, pages visited, and timestamps.
				</li>
				<li><strong>Cookies and Tracking Technologies:</strong> We use cookies to enhance user experience and
					analyze website performance.
				</li>
			</ul>

			<h2>3. How We Use Your Information</h2>
			<p>We use the collected information to:</p>
			<ul>
				<li>Provide and improve our services.</li>
				<li>Communicate with you regarding updates, offers, or support inquiries.</li>
				<li>Analyze website usage to enhance performance and user experience.</li>
				<li>Ensure security and prevent fraudulent activities.</li>
			</ul>

			<h2>4. Data Sharing and Disclosure</h2>
			<p>We do not sell or share your personal data with third parties, except in the following cases:</p>
			<ul>
				<li>When required by law or governmental authorities.</li>
				<li>To trusted service providers who assist in operating our website and services.</li>
				<li>In case of a business transfer, such as a merger or acquisition.</li>
			</ul>

			<h2>5. Cookies and Tracking Technologies</h2>
			<p>We use cookies to improve your experience on our website. You can manage cookie preferences through your
				browser settings. Disabling cookies may affect some functionalities of the site.</p>

			<h2>6. Data Security</h2>
			<p>We implement appropriate security measures to protect your data from unauthorized access, loss, or
				disclosure. However, no method of transmission over the internet is 100% secure.</p>

			<h2>7. Your Rights</h2>
			<p>Depending on your location, you may have the following rights regarding your personal data:</p>
			<ul>
				<li>The right to access, update, or delete your personal information.</li>
				<li>The right to restrict or object to data processing.</li>
				<li>The right to data portability.</li>
				<li>The right to withdraw consent for marketing communications.</li>
			</ul>
			<p>To exercise these rights, contact us at <strong>{{config('blog.credits.email')}}</strong>.</p>

			<h2>8. Third-Party Links</h2>
			<p>Our website may contain links to third-party websites. We are not responsible for their privacy policies
				and encourage you to review their terms before providing any personal data.</p>

			<h2>9. Changes to This Privacy Policy</h2>
			<p>We reserve the right to update this Privacy Policy. Any modifications will be posted on this page with an
				updated revision date. Your continued use of our services implies acceptance of these changes.</p>

			<h2>10. Contact Information</h2>
			<p>If you have any questions or concerns regarding this Privacy Policy, please contact us:</p>
			<p><strong>Email:</strong> {{config('blog.credits.email')}}</p>
			<p><strong>Address:</strong> {{config('blog.credits.address')}}</p>

		</div>
	</div>
</x-layouts.app>
