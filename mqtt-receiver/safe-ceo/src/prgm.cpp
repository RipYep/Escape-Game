////////////////////////////////////////////////////////////////////////////////
// HEAD
#include <stdlib.h>
#include <iostream>
#include <sstream>
#include <fstream>
#include <string>
#include <vector>
#include <regex>
#include <time.h>
#include <math.h>
#include <unistd.h>
#include "utils.h"

using namespace std;



////////////////////////////////////////////////////////////////////////////////
// PROTOTYPES
// Fonction pour lire le code IR depuis un fichier
bool isValidCode(const string &filePath, const string &validCode) {
  ifstream inputFile(filePath);
  string fileCode;

  if (inputFile.is_open()) {
    getline(inputFile, fileCode);  // Lit la première ligne du fichier
    inputFile.close();

    // Compare le code du fichier avec le code valide
    return fileCode == validCode;
  } else {
    cerr << "Erreur d'ouverture du fichier!" << endl;
    return false;
  }
}

void clearScreen() {
  #ifdef __linux__
  system("clear");
  #endif
}

void drawStickmanOpeningChest(bool codeValid) {
  cout << "  ____                         _                   __  __                 " << "\n";
  cout << " / __ \\                       | |                 / _|/ _|                " << "\n";
  cout << "| |  | |_   ___   ___ __ ___  | | ___    ___ ___ | |_| |_ _ __ ___        " << "\n";
  cout << "| |  | | | | \\ \\ / / '__/ _ \\ | |/ _ \\  / __/ _ \\|  _|  _| '__/ _ \\       " << "\n";
  cout << "| |__| | |_| |\\ V /| | |  __/ | |  __/ | (_| (_) | | | | | | |  __/       " << "\n";
  cout << " \\____/ \\__,_| \\_/ |_|  \\___| |_|\___|   \\___\\___/|_| |_| |_|  \\___|      " << "\n";
  cout << "                         _        _                                 _      " << "\n";
  cout << "                        | |      | |                               | |     " << "\n";
  cout << "   __ ___   _____  ___  | | ___  | |__   ___  _ __     ___ ___   __| | ___ " << "\n";
  cout << "  / _` \\ \\ / / _ \\/ __| | |/ _ \\ | '_ \\ / _ \\| '_ \\   / __/ _ \\ / _` |/ _ \\" << "\n";
  cout << " | (_| |\\ V /  __/ (__  | |  __/ | |_) | (_) | | | | | (_| (_) | (_| |  __/" << "\n";
  cout << "  \\__,_| \\_/ \\___|\\___| |_\\___|  |_.__/ \\___/|_| |_|  \\___\\___/ \\__,_|\\___| " << "\n";
  cout << "                                                                           " << "\n";
  cout << Utils::setTextColor(5) << "Appuyer bien sur la télécommande, bien proche du capteur. (Sans non plus défoncer la télécommande, merci !)" << Utils::resetTextColor() << "\n\n\n";
  cout << Utils::setTextColor(5) << "INDICE : C'est un fan d'histoire, notamment de Pearl Harbor dû à son grand-père et arrière grand-père." << Utils::resetTextColor() << "\n\n\n";

  // Si le code est valide (coffre explosé)
  if (codeValid) {
    Utils::clearScreen();

    cout << "                    ▓▓▓▓                    " << "\n";
    cout << "      ▒▒▒▒▒▒▒▒▒▒▒▒▒▒░░░░▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒░░    " << "\n";
    cout << "      ▓▓▒▒▒▒▒▒▒▒▒▒▒▒▓▓▒▒▒▒▓▓▒▒▒▒▒▒▒▒▒▒▒▒▓▓    " << "\n";
    cout << "      ▓▓▒▒▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▒▒▓▓    " << "\n";
    cout << "      ▓▓▒▒▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▒▒▓▓    " << "\n";
    cout << "      ▓▓▒▒▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▒▒▓▓    " << "\n";
    cout << "      ▓▓▓▓▓▓▓▓▓▓░░░░░░░░▓▓▓▓░░░░░░▓▓▓▓▓▓▓▓    " << "\n";
    cout << "      ▓▓▓▓▓▓▓▓▓▓░░░░░░░░▓▓▒▒░░░░░░▓▓▓▓▓▓▓▓    " << "\n";
    cout << "      ▓▓░░▓▓▓▓░░░░░░░░░░░░░░░░░░░░▓▓▓▓░░▓▓    " << "\n";
    cout << "      ▓▓░░▓▓░░░░▒▒░░░░░░░░▒▒▒▒░░░░░░▓▓░░▓▓    " << "\n";
    cout << "      ▓▓░░▓▓░░▒▒▒▒▒▒░░▒▒▒▒▒▒▒▒▒▒▒▒▒▒▓▓░░▓▓    " << "\n";
    cout << "      ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓    " << "\n";
    cout << "      ▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓    " << "\n";
    cout << "    ▒▒▓▓░░▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░▓▓▒▒  " << "\n";
    cout << "  ▒▒▒▒▓▓░░▓▓▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▓▓░░▓▓▒▒▒▒" << "\n";
    cout << "  ▒▒▒▒▓▓░░▓▓▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▓▓░░▓▓▒▒▒▒" << "\n";
    cout << "  ▒▒▒▒▓▓░░▓▓▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▓▓░░▓▓▒▒▒▒" << "\n";
    cout << "  ▒▒▒▒▓▓░░▓▓▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▓▓░░▓▓▒▒▒▒" << "\n";
    cout << "  ▒▒▒▒▓▓░░▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░▓▓▒▒▒▒" << "\n";
    cout << "  ▒▒▒▒▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▒▒▒▒" << "\n";
    cout << "  ▒▒▒▒▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▒▒▒▒" << "\n";
    cout << "  ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒" << "\n";
    cout << "    ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒" << "\n";

    cout << "                                                                                                                                           " << "\n";
    cout << "                                                                                                                                           " << "\n";
    cout << Utils::setTextColor(2) << "Le coffre est ouvert !" << "\n\n" << Utils::resetTextColor();
    cout << Utils::setTextColor(3) << "Contenu du coffre :" << Utils::resetTextColor() << "\n";
    cout << Utils::setTextColor(3) << "- Login et mot de passe à son compte de la base spatiale" << Utils::resetTextColor() << "\n";
    cout << Utils::setTextColor(3) << "- Identifiant et code de son compte bancaire" << Utils::resetTextColor() << "\n";
    cout << Utils::setTextColor(3) << "- Une photo de famille" << Utils::resetTextColor() << "\n";
    cout << Utils::setTextColor(3) << "- Des documents (il)légaux" << Utils::resetTextColor() << "\n";
    cout << Utils::setTextColor(3) << "- De l'or" << Utils::resetTextColor() << "\n";
    cout << Utils::setTextColor(3) << "- Une liste de ses collaborateurs" << Utils::resetTextColor() << "\n";
    cout << Utils::setTextColor(3) << "- Une arme à feux" << Utils::resetTextColor() << "\n\n";
  }
  // Sinon, afficher le coffre fermé
  else {
    // Affichage d'un coffre fermé
    cout << "      ██████████████████████████████████████       " << "\n";
    cout << "    ████▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒████    " << "\n";
    cout << "  ████▒▒▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▒▒████  " << "\n";
    cout << "  ██▒▒▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▒▒██  " << "\n";
    cout << "████▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓      ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓████" << "\n";
    cout << "██▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓  ░░░░░░  ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓██" << "\n";
    cout << "████████████████████  ░░░░░░  ████████████████████" << "\n";
    cout << "██▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒  ░░░░░░  ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒██" << "\n";
    cout << "██▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓  ░░██░░  ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓██" << "\n";
    cout << "██▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░██░░░░▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓██" << "\n";
    cout << "██▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓██" << "\n";
    cout << "██▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓██" << "\n";
    cout << "██░░░░░░▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░██" << "\n";
    cout << "██░░░░░░▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░██" << "\n";
    cout << "██░░░░░░▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░██" << "\n";
    cout << "██████████████████████████████████████████████████" << "\n";

  }
}


////////////////////////////////////////////////////////////////////////////////
// BODY
int main() {
  // Le code IR valide, tu peux le modifier en fonction de ton besoin
  string validCode = "1941";
  string filePath = "codeIR.txt";

  // Vérifie si le code dans le fichier est valide
  bool codeValid = isValidCode(filePath, validCode);

  // Main loop
  while (true) {
    // Vérifie si le code est valide à chaque itération
    codeValid = isValidCode(filePath, validCode);

    clearScreen();

    drawStickmanOpeningChest(codeValid);

    // Si le code est valide, on demande à l'utilisateur s'il veut fuir ou pas
    if (codeValid) {
      // system("bash startAlarm.sh");
      cout << Utils::setTextColor(2) << "L'alarme s'est déclenchée, la sécurité arrive dans 45 secondes !" << Utils::resetTextColor() << "\n";
      string choice = "";
      cout << "Voulez-vous fuir ? (y/n) : ";
      cin >> choice;

      if (choice == "yes" || choice == "Yes" || choice == "Y" || choice == "y") {
        Utils::clearScreen();
        cout << "Vous vous mettez à courir, mais on vous attrape... Vous pensiez quoi ? Vous voler une base spatiale..." << "\nTHE END";
        break;
      } else if (choice == "no" || choice == "No" || choice == "N" || choice == "n") {
        // Sinon, on lance le script launchRocket.sh
        system("bash launchRocket.sh");
        break;
      } else {
        cout << "Stressé...? Normale..." << "\n";
      }
    }

    // Attente de 12 secondes avant la prochaine itération
    Utils::delay(4500);
  }

  return 0;
}

////////////////////////////////////////////////////////////////////////////////
// FUNCTIONS
