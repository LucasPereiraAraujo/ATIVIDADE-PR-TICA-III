**cenário 1**



Entidades (classes):

\- Veiculo

\- Pagamento

\- Estacionamento

\- Ticket

\- Tarifa



Métodos:

\- Veiculo: tipo(), placa()

\- Pagamento: processarPagamento(valor), validarPagamento()

\- Estacionamento: registroEntrada(veiculo), registroSaida(ticket), liberarSaida(), calcularValor(ticket)

\- Ticket: registroEntrada(), registroPermanencia(), registroSaida()

\- Tarifa: calcularValor(tipoVeiculo, tempo)



Interface: 

Sim é importante o uso da interface 

ProcessarPagamento(valor)

ValidarPagamento(valor)

Deve ser implementado os meios 

PagamentoDinheiro

PagamentoCartao 



Relacionamentos: 

\- Estacionamento tem vários Tickets

\- Ticket está associado a um Veiculo

\- Estacionamento usa Tarifa para calcular o valor

\- Ticket possui um Pagamento

\- Pagamento usa a interface Forma de pagamento

\- Carro, moto, caminhão herdam de Veiculos



Exceções:

Na saída: verificar se os tickets são validos

No calculo: verificar tipo de veiculo não reconhecido

Pagamento: se o pagamento foi corretamente efetivado, sendo cartão. 





**cenário 2**



Entidades (Classes):

\- Aluno

\- Curso (abstrata, com subclasses CursoGratuito e CursoPago)

\- Aula

\- Matricula

\- Pagamento (interface, implementada por PagamentoCartao e PagamentoPix)



Métodos:

\- Aluno: matricular(Curso), listarCursos()

\- Curso: adicionarAula(Aula), listarAulas(), getTipo()

\- Matricula: registrarProgresso(Aula), getPercentualConcluido()

\- PagamentoCartao e PagamentoPix: processarPagamento(), confirmarPagamento()



Interface:

Sim, a interface Pagamento com os métodos processarPagamento() e confirmarPagamento(). Isso permite adicionar novas formas de pagamento no futuro sem alterar o restante do código.



Relacionamentos:

\- Aluno tem várias Matriculas

\- Curso tem várias Aulas

\- Matricula liga Aluno a Curso

\- CursoGratuito e CursoPago herdam de Curso

\- CursoPago usa a interface Pagamento

\- PagamentoCartao e PagamentoPix implementam Pagamento



Exceções:

Na matrícula: verificar se o aluno já está matriculado naquele curso

No pagamento: tratar cartão recusado, Pix inválido e garantir que a matrícula não seja criada se o pagamento falhar

No progresso: verificar se a aula pertence ao curso do aluno





**cenario 3**



Entidades (Classes):

\- Cliente

\- Tecnico

\- OrdemDeServico

\- Servico (abstrata, com subclasses Manutencao, Instalacao e Suporte)



Métodos:

\- Cliente: abrirOrdem(Servico)

\- Tecnico: executarOrdem(OrdemDeServico), finalizarOrdem(OrdemDeServico)

\- OrdemDeServico: getValorTotal(), getStatus()

\- Servico (abstrata): calcularPreco(), executar() — ambos abstratos, cada subclasse implementa do seu jeito



Interface:

Sim, pode-se criar a interface Executavel com os métodos executar() e calcularPreco(), que cada tipo de serviço implementa. Isso garante que todo serviço siga o mesmo contrato, independente de como cada um funciona internamente.



Relacionamentos:

\- Cliente abre várias Ordens de Servico

\- OrdemDeServico tem um Tecnico e um Servico

\- Manutencao, Instalacao e Suporte herdam de Servico

\- Servico implementa a interface Executavel



Exceções:



1 - Ao abrir a ordem: verificar se o cliente existe e se o tipo de serviço é válido

2 - Ao executar: verificar se a ordem já não foi finalizada ou cancelada

3 - Ao finalizar: garantir que o valor foi calculado antes de fechar a ordem





**cenário 4** 



Entidades (classes):

\- Usuario

\- Plano (abstrata, com subclasses Básico e Premium)

\- Conteúdo (abstrata, com subclasses Serie e Filme)

\- Pagamento (interface, implementada por PagamentoCartao e PagamentoPix)

\- Assinatura



Métodos:

\- Usuário: AssinarPLano(plano), CancelarAssinatura(), VerConteudos(conteudo), AlterarPlano(novoPlano) 

\- Plano: getQuantidadeTela(), getQualidadeVideo(), getConteudoDisponivel()

\- Conteúdo: Reproduzir(), Pausar(), Terminar()

\- Pagamento: ProcessarPagamento(valor), ValidarPagamento()

\- Assinatura: Ativar(), Renovar(), Cancelar(), Status()



Interface: 

Sim, é recomendado o uso principalmente no método de pagamento, onde será criado o método ProcessarPagamento(valor) e ValidarPagamento()



Relacionamentos:

\- Usario pode ter varias assinaturas

\- Assinatura pertence apenas a um plano

\- Um plano pode haver vários conteúdos

\- Um conteúdo está ligado a vários planos 

\- Usuário pode ver vários conteúdos

\- Cobrança gera um pagamento



Exceções: 

No pagamento: falha no pix ou cartão recusado

Na assinatura: falha em renovação automática, verificar se a pessoa possuiu assinatura

No conteúdo: limite de telas ultrapassado, plano não possui o conteúdo





**cenário 5**



Entidades (classes):

\- Carrinho

\- Pedido

\- Pagamento (interface, implementada por PagamentoCartao, PagamentoPIx e PagamentoBoleto)

\- Entrega (abstrata, com subclasses EntregaNormal, EntregaExpressa)

\- Cliente

\- Produto

\- ItemCarrinho

\- ItemPedido



Métodos: 

\- Cliente: AdicionaraoCarrinho(produto, quantidade), RemoverdoCarrinho(produto), ConcluirCompra()

\- Carrinho: AdicionarItem(produto, quantidade), RemoverItem(produto), CalcularProdutos(), EnviarParaPedido()

\- Pedido: GerarPedido(), CancelarPedido(), CalcularTotal(), ConfirmarPagamento()

\- ItemCarrinho: CalcularSubtotal() 

\- ItemPedido: CalcularSubtotal()

\- Entrega: CalcularFrete(), CalcularPrazo()

\- Pagamento: ProcessarPagamento(valor), ValidarPagamento()



Interface:

Sim, é de suma importância a implementação do metodo TipoEntrega onde irá definir frete e prazo, e outro método é o de Pagamento onde se cria o ProcessarPagamento(valor) e ValidarPagamento()



Relacionamento:

\- Cliente possui um carrinho

\- Carrinho possui vários itens

\- Carrinho vira um pedido

\- Pedido possui vários itens



Exceções:

No carrinho: quantidade indisponível

No pedido: falha ao finalizar o carrinho

No pagamento: falha no pix ou cartão recusado

Na entrega: falha ao calcular frete


