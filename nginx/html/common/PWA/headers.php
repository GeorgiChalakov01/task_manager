    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-status-bar" content="#000000">
    <meta name="theme-color" content="black">

    <link rel="manifest" href="/common/PWA/manifest.json">
    <link rel="icon" href="/common/PWA/icon.png" type="image/png">


    <script>
    	window.addEventListener('load', () => {
    	    registerSW();
    	});
    
    	// Register the Service Worker
    	async function registerSW() {
        	if ('serviceWorker' in navigator) {
        		try {
        		await navigator
        				.serviceWorker
        				.register('/common/PWA/serviceworker.js');
        		}
        		catch (e) {
        		console.log('SW registration failed');
        		}
        	}
    	}
    </script>
