/*
* Editado Paulo Rosa.
justificativa
*/
function Falta(parametros)
{
	this.create(parametros);

	this.setFalta = function (falta)
	{
	  this.falta = falta;
  }

  this.getIdAluno = function ()
	{
	  return this.idAluno;
  }

  this.getFalta = function ()
	{
	  return this.falta;
  }
}

Falta.prototype.create = function (parametros)
{
	this.idAluno = parametros.idAluno;
	this.falta = parametros.falta;
};
