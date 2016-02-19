/*
* Editado Paulo Rosa.
justificativa
*/
function Justificativa(parametros)
{
	this.create(parametros);

	this.setJustificativa = function (justificativa)
	{
	  this.justificativa = justificativa;
  }

  this.getIdAluno = function ()
	{
	  return this.idAluno;
  }

  this.getJustificativa = function ()
	{
	  return this.justificativa;
  }
}

Justificativa.prototype.create = function (parametros)
{
	this.idAluno = parametros.idAluno;
	this.justificativa = parametros.justificativa;
};
