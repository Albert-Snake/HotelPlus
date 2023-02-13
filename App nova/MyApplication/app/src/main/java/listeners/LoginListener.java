package listeners;

import android.content.Context;

import java.util.Map;


public interface LoginListener {
    void onLogin(Map<String, String> dadosLogin);

    void onValidateLogin(final Boolean rsp, final Context context);

    // vai devolve a resposta da API (informaçoes de utilizador)
}
