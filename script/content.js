chrome.runtime.onMessage.addListener(function(request, sender, sendResponse) {
    const domContent = document.documentElement.outerHTML;
    const domUrl = window.location.toString();
    if (request.action === 'totalStats') {
        sendResponse({ content: domContent, url: domUrl, type: 1 });
    }
    /**
    if (request.action === 'ecoStats') {
        sendResponse({ content: domContent, url: domUrl, type: 2 });
    }
    if (request.action === 'researchStats') {
        sendResponse({ content: domContent, url: domUrl, type: 3 });
    }*/
    if (request.action === 'militaryStats') {
        sendResponse({ content: domContent, url: domUrl, type: 4 });
    }
    if (request.action === 'galaxy') {
        const galaxyContent = document.getElementById('galaxy_input').value;
        const systemContent = document.getElementById('system_input').value;
        sendResponse({ content: domContent, url: domUrl, type: 5, galaxy: galaxyContent, system: systemContent });
    }
});