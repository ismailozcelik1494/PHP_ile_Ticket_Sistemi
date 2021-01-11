#include <stdio.h>
#include <unistd.h>
#include <stdlib.h>
#include <string.h>

#define MAX 20
#define H_SIZE 10

int komut_sayisi;
char gecmis[H_SIZE][MAX];

char buffer[MAX];
int background;
char *args[3];

int islem(char buffer[], char *args[]);
void history();

int main(void)
{
    while (1){
        printf("osh>");
        fflush(0);
        islem(buffer, args);
        int durum;
        pid_t pid = fork();
        if(pid < 0){
            printf("Fork Hatası! \n");
        }else if(pid == 0){
            if(buffer[0] == 'h' && buffer[1] == 'i' && buffer[2] == 's' && buffer[3] == 't' && buffer[4] == 'o' && buffer[5] == 'r' && buffer[6] == 'y'){
                history();
                return 0;
            }
            durum = execvp(args[0], args);
            if(durum != 0) {
                printf("%s: komut bulunamadı. \n", args[0]);
            }
        }else{
            if(background == 0){
                wait(NULL);
            }

        }
    }

	return 0;
}
int islem(char buffer[], char *args[]){
    int uzunluk, i, basla, sayac = 0;
    int temp;
    uzunluk = read(STDIN_FILENO, buffer, MAX);

    char cikismi[4];
    cikismi[0] = 'e';
    cikismi[1] = 'x';
    cikismi[2] = 'i';
    cikismi[3] = 't';


    if(cikismi[0] == buffer[0] && cikismi[1] == buffer[1] && cikismi[2] == buffer[2] && cikismi[3] == buffer[3])
         exit(0);

    basla = -1;


    if(uzunluk < 0){
        perror("komut okuma hatası");
        exit(-1);
    }else{
        buffer[uzunluk] = '\0';
        komut_sayisi++;
        int index = (komut_sayisi - 1) % H_SIZE;
        strcpy(gecmis[index], buffer);
        for(i = 0; i < uzunluk; i++){
            if (buffer[i] == '&') {
                buffer[i] = '\0';
                background = 1;
                --uzunluk;
                break;
            }
        }
    }
    for (i = 0; i < uzunluk; i++) {
        switch (buffer[i]){
            case ' ':
            case '\t' :
                if(basla != -1){
                    args[sayac] = &buffer[basla];
                    sayac++;
                }
                buffer[i] = '\0';
                basla = -1;
                break;

            case '\n':
                if (basla != -1){
                    args[sayac] = &buffer[basla];
                    sayac++;
                }
                buffer[i] = '\0';
                args[sayac] = NULL;
                break;

            default :
                if (basla == -1)
                    basla = i;
        }
    }
    args[sayac] = NULL;
}

void history()
{
    int i,j,k,x;
    int tekrarlamaSayisi = 0;
    int sayac = 0;
    if(komut_sayisi < 1){
        printf("Hiç Komut yok");
    }else{
        printf("\n\n");

	struct hstry{
          char  komut[20];
          int  sayac;
	};
	struct hstry history[20];
	int sonEleman = 0;
	int bo;
	for(j = 0; j < komut_sayisi; j++){
	sayac = 0;
		for(i = j; i < komut_sayisi; i++){
			bo = 1;
			for(x = 0; x < sonEleman; x++)
				if(strcmp(history[x].komut,gecmis[i]) == 0)
					bo = 0;

			if(strcmp(gecmis[j],gecmis[i]) == 0 && bo == 1)
				++sayac;
		}
		if(bo == 1){
		strcpy(history[sonEleman].komut,gecmis[j]);
		history[sonEleman].sayac = sayac;
		sonEleman++;
		}
	}
	for(j = 0; j <= sonEleman-1; j++){
		if(history[j].sayac != 0)
		printf("Komut %d : %s | tekrar : %d \n",j,history[j].komut,history[j].sayac);

	}

    }
}
