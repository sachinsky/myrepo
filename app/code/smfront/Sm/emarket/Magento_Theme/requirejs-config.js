var config = {
    paths: {            
            'easyTabs': "js/easyResponsiveTabs",
            'spmenu':'js/jquery.meanmenu',
			'spselect':'js/jquery.selectBoxIt'
        },   
    shim: {
        'easyTabs': {
            deps: ['jquery']
        },
        'spmenu': {
            deps: ['jquery']
        },
		'spselect': {
            deps: ['jquery']
        }
    }
};