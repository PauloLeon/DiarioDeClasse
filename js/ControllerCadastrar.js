var mvcCadastrar = angular.module('mvcCadastrar', []);

mvcCadastrar.controller('CadastrarController', function CadastrarController($scope) {
	
	$scope.escolas = [
		{name:'Impacto', cidade: 'Belem'},
		{name:'Nazaré', cidade: 'Belem'},
		{name:'Universo', cidade: 'Belem'},
		{name:'Teorema', cidade: 'Belem'},
		{name:'Moderno', cidade: 'Belem'}
	];

	$scope.addEscola = function() {
		$scope.escolas.push({name : $scope._nome, capital : $scope._cidade});
		$scope._nome = '';
		$scope._cidade = '';
	};
	
	
	
});