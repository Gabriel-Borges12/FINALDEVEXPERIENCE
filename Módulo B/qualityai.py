import pandas as pd
import tkinter as tk
from tkinter import filedialog, messagebox

def analisar_pecas(filepath):
    # Ler a base de dados
    try:
        dados = pd.read_csv(filepath)
    except Exception as e:
        messagebox.showerror("Erro", f"Erro ao ler o arquivo: {e}")
        return

    # Validar os critérios
    dados['Status'] = 'Aprovada'
    dados.loc[
        (dados['Peso (g)'] < 50) | (dados['Peso (g)'] > 100) |
        (dados['Tamanho (cm)'] < 10) | (dados['Tamanho (cm)'] > 20) |
        (dados['Acabamento'] <= 7), 
        'Status'
    ] = 'Rejeitada'

    # Estatísticas
    total = len(dados)
    rejeitadas = len(dados[dados['Status'] == 'Rejeitada'])
    aprovadas = total - rejeitadas
    percentual_rejeitadas = (rejeitadas / total) * 100
    percentual_aprovadas = (aprovadas / total) * 100

    # Exibir estatísticas
    resultado = (
        f"Total de peças analisadas: {total}\n"
        f"Peças aprovadas: {aprovadas} ({percentual_aprovadas:.2f}%)\n"
        f"Peças rejeitadas: {rejeitadas} ({percentual_rejeitadas:.2f}%)\n"
    )

    # Exibir alerta se mais de 20% das peças forem rejeitadas
    if percentual_rejeitadas > 20:
        resultado += "⚠️ ALERTA: Mais de 20% das peças foram rejeitadas! Revise o processo.\n"

    # Listar peças rejeitadas
    pecas_rejeitadas = dados[dados['Status'] == 'Rejeitada']
    resultado += "\nPeças rejeitadas:\n"
    resultado += pecas_rejeitadas.to_string(index=False)

    # Exibir o resultado em uma janela
    messagebox.showinfo("Resultado da Análise", resultado)

def selecionar_arquivo():
    # Abrir diálogo para selecionar o arquivo CSV
    filepath = filedialog.askopenfilename(
        title="Selecione o arquivo CSV",
        filetypes=[("Arquivos CSV", "*.csv")]
    )
    if filepath:
        analisar_pecas(filepath)

# Interface Gráfica
def criar_interface():
    janela = tk.Tk()
    janela.title("Análise de Peças - QualityAI Solutions")
    janela.geometry("400x200")

    # Título
    titulo = tk.Label(janela, text="Análise de Peças", font=("Helvetica", 16))
    titulo.pack(pady=20)

    # Botão para selecionar arquivo
    botao_selecionar = tk.Button(
        janela, text="Selecionar Arquivo CSV", command=selecionar_arquivo,
        font=("Helvetica", 12), bg="#4CAF50", fg="white"
    )
    botao_selecionar.pack(pady=10)

    # Rodar a janela
    janela.mainloop()

# Iniciar a interface
if __name__ == "__main__":
    criar_interface()
